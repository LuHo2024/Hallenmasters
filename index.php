<?php
// Redirect to the static `index.html` so the static client is used as primary UI
header('Location: /index.html', true, 302);
exit;
