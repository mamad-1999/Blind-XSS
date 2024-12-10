# Blind XSS Notification Tool

This repository contains a set of scripts designed to demonstrate and help detect Blind XSS vulnerabilities. It also includes functionality to notify a Discord channel when a Blind XSS payload is triggered.

## Files Overview

1. **blind-xss-server.php**  
   The server-side PHP script that listens for requests from a victim's browser. When a Blind XSS payload is triggered, it sends the collected data (including user agent, cookies, session storage, etc.) to a specified Discord webhook.

2. **blind-xss-victim.html**  
   A simple HTML page containing the payload that sends sensitive browser data (user agent, cookies, session storage, etc.) to the `blind-xss-server.php` when loaded in the victim's browser. This simulates a Blind XSS attack.

3. **test-discord-notify.php**  
   A script used to test sending a message to a Discord webhook. You can use it to verify if the Discord notification system is working before using it with the Blind XSS functionality.

## Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/blind-xss-notify.git
   cd blind-xss-notify
   ```

2. Modify the URLs in the scripts:
   - In `blind-xss-server.php`, replace `"DISCORD_URL"` with your actual Discord webhook URL.
   - In `blind-xss-victim.html`, replace `"URL"` with the URL of `blind-xss-server.php` on your server.

3. Upload the files to your web server.

4. Test the Discord notification system by accessing `test-discord-notify.php`.

## Usage

- To trigger the Blind XSS, host the `blind-xss-victim.html` page and send the victim to the page.
- When the victim's browser loads the page, it will send sensitive data to the server, which then triggers a Discord notification.
