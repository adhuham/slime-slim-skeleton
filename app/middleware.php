<?php

// ...

// Your middleware

// ...

// NOTICE! You shall not put any miodleware after this line
$app->addErrorMiddleware(config('DISPLAY_ERRORS'), true, true);
