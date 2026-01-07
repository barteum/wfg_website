
    // --- BACKUP & RESTORE SYSTEM --- //

    async function performBackup() {
        if (!isLoggedIn) {
            alert("Please log in to backup your Bible data.");
            return;
        }
        
        if (!personalFileHandle) {
            alert("No Personal Bible file is currently active.");
            return;
        }

        const confirmBackup = confirm("This will upload your current Bible data to the server for 7 days, allowing you to transfer it to another device.\n\nProceed?");
        if (!confirmBackup) return;

        try {
            // Get file
             const file = await personalFileHandle.getFile();
             
             const formData = new FormData();
             formData.append('backup_file', file);
             
             const status = document.getElementById('pbStatusText');
             if(status) status.innerText = "Backing up...";

             const res = await fetch('bible/backup_api.php?action=backup', {
                 method: 'POST',
                 body: formData
             });
             
             const data = await res.json();
             
             if (data.success) {
                 alert("Backup Successful!\n\n" + data.message);
             } else {
                 alert("Backup Failed: " + (data.error || "Unknown error"));
             }
             
             if(status) status.innerText = "My Bible Active";

        } catch (e) {
            console.error("Backup error", e);
            alert("An error occurred during backup.");
             const status = document.getElementById('pbStatusText');
             if(status) status.innerText = "My Bible Active";
        }
    }

    async function checkForBackup() {
        try {
            const res = await fetch('bible/backup_api.php?action=check');
            const data = await res.json();
            
            if (data.exists) {
                // Show Restore Prompt
                // Use a custom modal or just a confirm for now? 
                // User said: "it should ask if they want to load their backup"
                // Let's create a nice modal for this.
                showRestoreModal(data.timestamp, data.age_days);
            }
        } catch (e) {
            console.warn("Backup check failed", e);
        }
    }
    
    function showRestoreModal(timestamp, age) {
        // Create Modal HTML dynamically if not exists
        let modal = document.getElementById('restoreBackupModal');
        if (!modal) {
             const div = document.createElement('div');
             div.id = 'restoreBackupModal';
             div.className = 'modal-overlay';
             div.innerHTML = `
                <div class="modal-container" style="max-width: 450px; text-align: center;">
                    <div class="modal-header">
                        <h2>Restore Bible Backup?</h2>
                        <button class="modal-close" onclick="closeModal('restoreBackupModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <p>We found a backup of your Personal Bible on the server.</p>
                        <div style="background: rgba(255,255,255,0.05); padding: 1rem; margin: 1rem 0; border-radius: 8px;">
                            <strong style="color: var(--gold); display: block; margin-bottom: 0.5rem;">Backup Details</strong>
                            <div style="font-size: 0.9rem; color: #ccc;">Date: <span id="restoreDate"></span></div>
                            <div style="font-size: 0.9rem; color: #ccc;">Age: <span id="restoreAge"></span> days ago</div>
                        </div>
                         <p style="font-size: 0.9rem; color: #aaa; margin-bottom: 1.5rem;">
                            Do you want to download and overwrite your current local data with this backup?
                         </p>
                        <div style="display: flex; gap: 1rem; justify-content: center;">
                            <button class="btn-gold" onclick="performRestore()">Yes, Restore</button>
                            <button class="btn-outline" onclick="closeModal('restoreBackupModal')">No, Keep Local</button>
                        </div>
                    </div>
                </div>
             `;
             document.body.appendChild(div);
             modal = div;
        }
        
        document.getElementById('restoreDate').textContent = new Date(timestamp).toLocaleString();
        document.getElementById('restoreAge').textContent = age;
        modal.classList.add('active');
    }
    
    async function performRestore() {
        closeModal('restoreBackupModal');
        
        try {
            // Download file content
            const res = await fetch('bible/backup_api.php?action=restore');
            if (!res.ok) throw new Error("Download failed");
            
            const blob = await res.blob();
            const text = await blob.text();
            
            // Check if we have a handle
            if (!personalFileHandle) {
                // If no handle, ask to create/save
                alert("Please save this restored file to your device.");
                await createMyBibleData(); // This sets personalFileHandle
            }
            
            // Write to handle
            const writable = await personalFileHandle.createWritable();
            await writable.write(text);
            await writable.close();
            
            alert("Restore Complete! Your Bible data has been updated.");
            
            // Reload
            await loadPersonalContent();

        } catch (e) {
            console.error("Restore failed", e);
            alert("Failed to restore backup: " + e.message);
        }
    }
