# Test Results
Handles acceptance tests result tracking for Caldera Forms acceptance tests.

## Flow
* Import tests to a WordPress site using the [importer plugin].
* Request a test run from this app,
    - POST `api/v1/test-run' 
    - Body : `{"runUuid": "aa1-xxx-aaaa","testListUrl": "https://testsite.com/wp-json/ghost-runner/v1/tests"}`
* The `WatchesTestRun` observer will automatically find URLs for starting tests and then run them.
* Use GET `/api/v1/test-run/{id}` or GET `/api/v1/test-run/byRunUuid` to read results

## Other
* This is a work in progress.
* This is an internal tool for Caldera Forms development.
* Copyright 2018 CalderaWP LLC, License: GPL v2.0+