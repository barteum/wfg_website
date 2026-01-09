
    // --- USER OPTIONS SYSTEM --- //
    
    let userOptions = {
        nameGod: 'Yehovah',
        nameMessiah: 'Jesus',
        deviceId: '',
        localDbName: ''
    };
    
    // Substitutions Map (Source -> Current Replacement)
    const BASE_TERMS = {
        GOD: ['Yahweh', 'Jehovah', 'LORD', 'YHWH'], 
        MESSIAH: ['Yeshua', 'Jesus', 'Iesous', 'Christ']
    };
    
    function generateDeviceId() {
        let id = localStorage.getItem('wfg_device_id');
        if (!id) {
            id = crypto.randomUUID();
            localStorage.setItem('wfg_device_id', id);
        }
        return id;
    }
    
    function updateSelectDisplay(selectId, value) {
        const select = document.getElementById(selectId);
        if (!select) return;
        // 1. Reset all options to base text
        Array.from(select.options).forEach(opt => {
            opt.text = opt.text.replace(' (Current)', '');
        });
        // 2. Set Value
        select.value = value;
        // 3. Mark Selected
        const selectedOpt = select.options[select.selectedIndex];
        if (selectedOpt) {
            selectedOpt.text = selectedOpt.text + ' (Current)';
        }
    }

    function openSettingsModal() {
        // Update UI State
        const idEl = document.getElementById('optDeviceId');
        if(idEl) idEl.innerText = generateDeviceId();
        
        // Auth State
        const ad = document.getElementById('stAuthDot');
        const at = document.getElementById('stAuthText');
        const aa = document.getElementById('stAuthAction');
        
        if (ad && at && aa) {
            if (isLoggedIn) {
                ad.style.backgroundColor = '#00cc66';
                at.innerText = "Logged In as " + (currentUser ? currentUser.username : 'User');
                aa.innerText = "Log Out";
                aa.href = currentUser.logout_url;
            } else {
                ad.style.backgroundColor = '#666';
                at.innerText = "Not Logged In";
                aa.innerText = "Log In";
                aa.href = "../wp-login.php?redirect_to=" + encodeURIComponent(window.location.href);
            }
        }

        // Prefs - Dynamic Update
        updateSelectDisplay('optNameGod', userOptions.nameGod);
        updateSelectDisplay('optNameMessiah', userOptions.nameMessiah);
        
        // CHECK LOCAL MODE
        const prefsDiv = document.getElementById('prefsSection');
        if (prefsDiv) {
            if (typeof isPersonalMode !== 'undefined' && isPersonalMode) {
                prefsDiv.style.opacity = '1';
                prefsDiv.style.pointerEvents = 'auto';
                prefsDiv.style.filter = 'none';
            } else {
                prefsDiv.style.opacity = '0.5';
                prefsDiv.style.pointerEvents = 'none';
                prefsDiv.style.filter = 'grayscale(100%)';
            }
        }
        
        document.getElementById('settingsModal').classList.add('active');
    }
    
    async function loadUserOptions() {
        // 1. Load from Cloud (if logged in)
        if (isLoggedIn) {
            try {
                const res = await fetch('options_api.php?action=get');
                const data = await res.json();
                if (data.success && data.options) {
                    if (data.options['Name of God']) userOptions.nameGod = data.options['Name of God'];
                    if (data.options['Name of Messiah']) userOptions.nameMessiah = data.options['Name of Messiah'];
                    if (data.options['Local DB Name']) userOptions.localDbName = data.options['Local DB Name'];
                    
                    // Apply immediately
                    applyNameSubstitutions();
                    return;
                }
            } catch (e) { console.warn("Options sync failed", e); }
        }
        
        // 2. Fallback to LocalStorage (Guest or Offline)
        const local = localStorage.getItem('wfg_user_options');
        if (local) {
            try {
                const p = JSON.parse(local);
                userOptions = { ...userOptions, ...p };
                applyNameSubstitutions();
            } catch(e) {}
        }
    }
    
    async function saveUserOptions(skipUI = false) {
        // Get values from UI if not skipping
        let newGod, newMessiah;
        
        if (!skipUI) {
            newGod = document.getElementById('optNameGod').value;
            newMessiah = document.getElementById('optNameMessiah').value;
            // Update Memory
            userOptions.nameGod = newGod;
            userOptions.nameMessiah = newMessiah;
        } else {
             newGod = userOptions.nameGod;
             newMessiah = userOptions.nameMessiah;
        }
        
        const devId = generateDeviceId();
        userOptions.deviceId = devId;
        
        // Local Save
        localStorage.setItem('wfg_user_options', JSON.stringify(userOptions));
        
        // Cloud Save (if logged in)
        if (isLoggedIn) {
             const updates = {
                 "Name of God": newGod,
                 "Name of Messiah": newMessiah,
                 "Device ID": devId,
                 "Local DB Name": userOptions.localDbName
             };
             
             try {
                const btn = document.querySelector('#settingsModal button.btn-outline-sm');
                if(btn) { btn.innerText = "Saving..."; btn.disabled = true; }
                
                await fetch('options_api.php?action=update', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(updates)
                });
                
                if(btn) { btn.innerText = "Saved!"; setTimeout(()=> { btn.innerText="Save & Apply Changes"; btn.disabled=false; }, 1500); }
             } catch(e) { console.error("Cloud save failed", e); }
        } else {
             const btn = document.querySelector('#settingsModal button.btn-outline-sm');
             if(btn) { btn.innerText = "Saved (Local Only)"; setTimeout(()=> btn.innerText="Save & Apply Changes", 1500); }
        }
        
        // APPLY DATA TRANSFORMATION
        applyNameSubstitutions();
        
        // Rerender
        closeModal('settingsModal');
        // Refresh View
        if (currentResults.length > 0) displayResults();
    }
    
    // THE GLOBAL REPLACE LOGIC
    function applyNameSubstitutions() {
        if (!isDataLoaded) return;
        
        const targetGod = userOptions.nameGod;
        const targetMessiah = userOptions.nameMessiah;
        
        const godPattern = /\b(Yahweh|Jehovah|LORD|YHWH|Yehovah)\b/g;
        const messiahPattern = /\b(Yeshua|Jesus|Iesous|Y'shua)\b/g;
        
        bibleData.forEach(v => {
            let txt = v.t;
            txt = txt.replace(godPattern, targetGod);
            txt = txt.replace(messiahPattern, targetMessiah);
            v.t = txt;
        });
        console.log("Substitutions applied.");
    }

    // --- STATUS DROPDOWN LOGIC ---
    function toggleStatusDropdown(event) {
        if(event) event.stopPropagation();
        const menu = document.getElementById('statusDropdownMenu');
        const isVisible = menu.classList.contains('visible');
        
        const dotOnline = document.getElementById('menuDotOnline');
        const dotLocal = document.getElementById('menuDotLocal');
        
        if (typeof isPersonalMode !== 'undefined' && isPersonalMode) {
            if(dotOnline) dotOnline.className = 'status-dot red';
            if(dotLocal) dotLocal.className = 'status-dot green';
        } else {
            if(dotOnline) dotOnline.className = 'status-dot green';
            if(dotLocal) dotLocal.className = 'status-dot red';
        }

        if (isVisible) {
            menu.classList.remove('visible');
            setTimeout(() => menu.style.display = 'none', 200);
        } else {
            menu.style.display = 'block';
            void menu.offsetWidth; 
            menu.classList.add('visible');
        }

        const closeFn = (e) => {
            if (!e.target.closest('.status-dropdown-container')) {
                menu.classList.remove('visible');
                setTimeout(() => menu.style.display = 'none', 200);
                document.removeEventListener('click', closeFn);
            }
        };
        setTimeout(() => document.addEventListener('click', closeFn), 10);
    }

    async function switchStatus(mode) {
        if (mode === 'ONLINE') {
            if (typeof switchToOnlineMode === 'function') {
                switchToOnlineMode();
            }
        } else if (mode === 'LOCAL') {
            if (personalFileHandle) {
                 await checkPersonalBible(); 
            } else {
                try {
                     await checkPersonalBible(); 
                } catch (e) { console.log("Connect error", e); }
            }
            
            setTimeout(() => {
                if (!isPersonalMode) {
                     if (personalFileHandle) personalFileHandle = null; 
                     if(typeof startSmartSetup === 'function') startSmartSetup();
                     else showCreatePrompt();
                }
            }, 500);
        }
        
        const menu = document.getElementById('statusDropdownMenu');
        menu.classList.remove('visible');
        setTimeout(() => menu.style.display = 'none', 200);
    }
    
    function showCreatePrompt() {
        const id = 'createPromptModal';
        let modal = document.getElementById(id);
        
        if (!modal) {
            modal = document.createElement('div');
            modal.id = id;
            modal.className = 'modal-overlay';
            modal.innerHTML = `
                <div class="modal-container" style="max-width: 400px; text-align: center;">
                    <div class="modal-header">
                        <h2>Create Local Bible?</h2>
                        <button class="modal-close" onclick="closeModal('${id}')">✕</button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                         <p style="color:var(--white); margin-bottom:1.5rem;">
                            No Local Bible connected. Would you like to create one now?
                         </p>
                         <div style="display:flex; gap:1rem; justify-content:center;">
                             <button class="btn-gold" onclick="triggerCreation()">Yes, Create</button>
                             <button class="btn-outline" onclick="closeModal('${id}')">Cancel</button>
                         </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
        }
        
        window.triggerCreation = async () => {
             closeModal(id);
             if (typeof handleBibleAction === 'function') {
                 try {
                     const opts = {
                        suggestedName: 'My Bible Data.txt',
                        types: [{
                            description: 'Walk For God Bible Data',
                            accept: {'text/plain': ['.txt']},
                        }],
                    };
                    const handle = await window.showSaveFilePicker(opts);
                    personalFileHandle = handle;
                    await loadPersonalContent(); 
                    updateStatusUI('LOCAL');
                 } catch(e) { console.log("Creation cancelled"); }
             }
        }
        
        modal.classList.add('active');
    }

    // --- AUTHENTICATION CHECK ---
    async function checkAuthStatus() {
        try {
            const res = await fetch('auth_check.php?t=' + Date.now());
            const data = await res.json();
            
            if (data.authenticated) {
                isLoggedIn = true;
                currentUser = {
                    username: data.username,
                    display_name: data.user_display_name,
                    logout_url: data.logout_url || "auth_check.php?action=logout"
                };
                console.log("Auto-login success:", currentUser.username);
                loadUserOptions();
                if(document.getElementById('settingsModal') && document.getElementById('settingsModal').classList.contains('active')) {
                    openSettingsModal(); // refresh
                }
            } else {
                isLoggedIn = false;
                currentUser = null;
            }
        } catch (e) { console.warn("Auth check failed", e); }
    }

    document.addEventListener('DOMContentLoaded', () => {
        checkAuthStatus();
    });
