create database db_testing;
grant all PRIVILEGES on db_testing.* to username@`%`;
flush PRIVILEGES;