# PHP_profile
A very simple PHP profiler that consists of just two functions - one that toggles the profiler and another that prints out a summary of the profiler results. The profiler can be called for 

Usage:

<pre>

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

print_profile();    // Prints a summary of profile time sums (in ms) for each function profiled

/* Example output:
Profile:
---------------------------
  Function: myFunc
  Calls:  1
  Total time: 103
  Start time: 124463456465
  End time: 124463456568
  Average time: 103
---------------------------
  Function: myFunc2
  Calls:  1
  Total time: 103
  Start time: 124463456465
  End time: 124463456568
  Average time: 103
*/

</pre>
