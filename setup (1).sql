CREATE TABLE robot_state (
    id INT PRIMARY KEY,
    command CHAR(1) NOT NULL DEFAULT 's',
    voice_text VARCHAR(255) DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) DEFAULT CHARSET=utf8mb4;

INSERT INTO robot_state (id, command, voice_text)
VALUES (1, 's', 'Ready');
