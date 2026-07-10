<?php
http_response_code(200);
header('Content-Type: text/plain');
echo "PONG! PHP MENYALA di Vercel.\n";
echo "Versi PHP: " . phpversion() . "\n";
