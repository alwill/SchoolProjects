<?php

# Destories the session and redirects user back to homepage.
session_start();
session_destroy();

header("Location: /phase5/");
?>