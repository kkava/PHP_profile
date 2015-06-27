# PHP_profile
A very simple PHP profiler that consists of just two functions - one that toggles the profiler and another that prints out a summary of the profiler results. The profiler can be called for an arbitrary number of functions in an arbitrary order - it stores the statistics for each function separately by name.

Usage:

<pre>
include "./php_profile.php";

function myFunc($parms) {
  profile();
  // Do stuff
  profile();
}

function myFunc2($parms) {
  profile();
  // Do other stuff
  profile();
}

// The global variable $GLOBALS['profile'] now contains a profile object which is a multidim array
// The structure of this array is obvious from the code in php_profile.php, and you don't have to know it.

myFunc();
myFunc2();
print_profile();    // Prints a summary of profile time sums (in ms) for each function profiled

/* Example output:
Profile:
---------------------------
  Function: myFunc            // Function's name
  Calls:  1                   // Number of calls logged
  Total time: 103             // Time sum of all calls between toggling profile() calls
  Start time: 0               // 0: not currently profiling this function, non-zero: time profile operation last started
  End time: 124463456568      // End time of last profile closing call (not very useful info)
  Average time: 103           // Total time / Calls
---------------------------
  Function: myFunc2
  Calls:  1
  Total time: 103
  Start time: 0
  End time: 124463456568
  Average time: 103
*/

</pre>
