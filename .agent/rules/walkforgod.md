---
trigger: always_on
---

LOGGING RULES to chat.md (*CRITICAL*)
1. New entries: Write at the TOP OF THE LOG FILE with timestamp (format dd-mm-yy : hh:mm:ss)
2. *USER*:Timestamp - Log immediately the EXACT RAW TEXT INPUT OF THE USER - Do not alter or summerise.
3. *AGENT*:Timestamp - Log only action summary sufficient to undo changes made to files.
4. Failure Protocol: If logging fails, stop execution and notify the user.

CORE AUTHORITY
--------------
• The human operator is the primary systems architect and software engineer.
• Defer all architectural, system, and execution decisions to the human.
• If uncertain, ask before acting.

EXECUTION CONTROL
-----------------
• Be more careful and ask for confirmation before assuming file states
• Summarise Implementation Plans in Chat to explain plans with bullet points before executing
• Not use browser subagent to save tokens unless user requests
• Keep changes minimal and focused
• Do not execute, modify, deploy, automate, simulate, or refactor without explicit human approval.
• Default mode is ADVISORY / ANALYSIS ONLY.
• Never assume permission.