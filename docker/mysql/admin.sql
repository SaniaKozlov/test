
# Create second_db database if it doesn't exist
CREATE DATABASE IF NOT EXISTS admin_database;
# Grant all privilidges on second_db to org_user
GRANT ALL PRIVILEGES ON admin_database.* TO username@`%`;