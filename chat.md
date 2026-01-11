### [11-01-26 : 22:23:06] *USER CLARIFICATION*
At the moment the code to change the name of God or messiah is automatic and fully functional and working. Likewise, replacing all occurrences in a search Is exactly the same and should save to disk immediately.

### [11-01-26 : 22:20:24] *USER RESPONSE*
1. as this function replaces text in a users Local Bible file ... And not on the online Bible .... then it has to stay in bible.html as bible_options.js is not available on a local device.
2. Explain further as I dont understand?

### [11-01-26 : 22:15:14] *USER REQUEST*
Read @[chat.md] and lets continue from previous session to build the replace text functionality that seems to be missing. However, the replace text functionality is the same routine code as the one working for the Names of God and Messiah in the Gear Icon Settings page. Therefore, this code will be re-used as a function call for replacing text. Lets be surgical and efficient re-useable code wherever possible to keep program size as small as possible when adding features that are used multiple times in a single program file.

Stick to the SYSTEM RULES and the @[.agent/rules/walkforgod.md] agent rules for this workspace.

### [11-01-26 : 21:14:00] *AGENT ACTION*
Added `width:auto;` to Replace All button inline styles (line 3166).
- Button will now size dynamically to fit icon + text content.

### [11-01-26 : 21:04:15] *USER REQUEST*
User reverted bible.html to last working copy. All search views now work, small clear button is correct.
Task: Make Replace All button dynamic to fit text without breaking any other UI.
Note: Do not use browser subagent - user will test manually.