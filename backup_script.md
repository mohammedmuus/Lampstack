
### 2. **`backupscript.md` (Backup Script)**

**Content:**
```markdown
# Backup Script for MySQL Database

This document explains the backup script that automatically backs up the `company_db` MySQL database to a specified directory.

## Script Overview

The script is designed to:

1. Connect to a MySQL database.
2. Create a backup of the specified database.
3. Retain only the last 7 backups, removing older files.

## Script Details

### Backup Script Code

The following is the code for the backup script (`backup_db.sh`):

```bash
#!/bin/bash

# Database credentials
USER="root"
PASSWORD="toor"
HOST="localhost"
DB_NAME="company_db"

# Backup directory
BACKUP_DIR="/var/backups"
DATE=$(date +"%Y%m%d%H%M")

# Create backup
mysqldump -u$USER -p$PASSWORD -h$HOST $DB_NAME > $BACKUP_DIR/${DB_NAME}_backup_$DATE.sql

# Remove backups older than 7 days
find $BACKUP_DIR -name "${DB_NAME}_backup_*.sql" -type f -mtime +7 -exec rm {} \;

echo "Backup of $DB_NAME completed successfully."
Instructions to Run the Script
Create a directory for scripts (if not already created):

bash
Copy code
mkdir -p ~/scripts
Save the backup script to the scripts directory:

bash
Copy code
nano ~/scripts/backup_db.sh
Make the script executable:

bash
Copy code
chmod +x ~/scripts/backup_db.sh
Execute the script:

bash
Copy code
~/scripts/backup_db.sh
Automation
To automate the backup process:

Open crontab:

bash
Copy code
crontab -e
Add the following line to schedule the script daily at 2 AM:

bash
Copy code
0 2 * * * /home/your_username/scripts/backup_db.sh
Replace your_username with your actual username.
