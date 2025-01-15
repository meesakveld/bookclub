<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:send-weekly-email')->weekly();