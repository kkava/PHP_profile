	// Saves the time taken by the calling function in $GLOBALS['profile']
	function profile() {
		global $profile;
		if ($profile === null) $profile = array();
		list(, $caller) = debug_backtrace(false);
		$caller = $caller['function'];
		// Init the timer entry for this function
		if (!array_key_exists("$caller", $profile)) {
				$profile["$caller"]['Function'] = $caller;
				$profile["$caller"]['Calls'] = 1;
				$profile["$caller"]['Total Time'] = 0.0;
				$profile["$caller"]['Start Time'] = 0.0;
				$profile["$caller"]['End Time'] = 0.0;
				$profile["$caller"]['Average Time'] = 0.0;
		}
		if ($profile["$caller"]['Start Time'] === 0.0) {		// Timer is starting
			$profile["$caller"]['Calls'] += 1;
			$profile["$caller"]['Start Time'] = microtime(TRUE);
		} else {								// Timer is now turning off and recording time delta
			$profile["$caller"]['End Time'] = microtime(TRUE);
			$thisTime = $profile["$caller"]['End Time'] - $profile["$caller"]['Start Time'];
			$profile["$caller"]['Total Time'] += $thisTime;
			$profile["$caller"]['Average Time'] = $profile["$caller"]['Total Time'] / $profile["$caller"]['Calls'];
			$profile["$caller"]['Start Time'] = 0.0;			// 0.0 means timer is not set/active
		}
	}
	
	// Prints out profiler results
	function print_profile() {
		global $profile;
		if ($profile === null)
			return;
		echo "Profile:<br>\n";
		foreach ($profile as $callerName => $callerData) {
			echo "<hr>\n";
			foreach ($callerData as $stat => $value) {
				echo "    $stat:\t$value<br>\n";
			}
		}
		echo "<hr>\n";
	}
