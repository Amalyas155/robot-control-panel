# Robot Control Panel with Voice Commands 🤖

A web-based control panel for sending robot movement commands through buttons or voice recognition. The recognized speech and the movement command are saved in a MySQL database.

## Live Demo

[Open the Robot Control Panel](https://amalyasser.kesug.com/index.html)

## Features

- Control the robot using **Forward, Backward, Left, Right, and Stop** buttons.
- Convert speech to text using the browser's **Web Speech API**.
- Supports English and Arabic voice commands.
- Store the recognized text and movement command in a MySQL database.
- Retrieve the latest robot state through `get_state.php`.

## Command Mapping

| Movement | Saved command |
| --- | --- |
| Forward | `f` |
| Backward | `b` |
| Left | `l` |
| Right | `r` |
| Stop | `s` |

## Technologies Used

- HTML5
- CSS3
- JavaScript
- Web Speech API
- PHP
- MySQL
- InfinityFree

## Project Files

```text
robot-control-panel/
├── index.html             # Control panel and voice recognition interface
├── update_command.php     # Saves commands and voice text in MySQL
├── get_state.php          # Returns the latest robot state as JSON
├── db.example.php          # Safe database connection template
├── setup.sql              # Creates the database table
└── .gitignore             # Prevents real database credentials from being uploaded
```

## Setup

1. Create a MySQL database in InfinityFree.
2. Open phpMyAdmin and run the SQL code in `setup.sql`.
3. Copy `db.example.php` and rename the copy to `db.php`.
4. Add your real MySQL hostname, username, password, and database name inside `db.php`.
5. Upload `index.html`, `db.php`, `update_command.php`, and `get_state.php` to the `htdocs` folder.
6. Open `index.html` in Google Chrome and allow microphone access.



## How It Works

1. The user presses a movement button or speaks a command.
2. JavaScript converts the spoken command into text.
3. The text and its matching movement letter are sent to `update_command.php`.
4. PHP updates the single row in the `robot_state` table.
5. `get_state.php` can be used by the robot or another system to read the latest command.

## Example Database Output

```json
{
  "command": "r",
  "voice_text": "right",
  "updated_at": "2026-08-07 11:08:48"
}
```

## Screenshots

<img width="482" height="568" alt="Screenshot 2026-08-07 211041" src="https://github.com/user-attachments/assets/ed333b9b-f7f3-46d8-8876-d8cce0c69606" />

<img width="676" height="371" alt="Screenshot 2026-08-07 211025" src="https://github.com/user-attachments/assets/a694da96-11d8-4a53-9f48-0daf73fb8650" />



- Control panel with a recognized voice command.
- phpMyAdmin showing `voice_text` and `command` values.

## Author

Amal Yasser  
Computer & Network Engineering Student
