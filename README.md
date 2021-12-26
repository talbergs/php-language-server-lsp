"There is no drug like service, when taken pure"

Thanks to:
- https://revolt.run

# Kernel:
- main event loop

# Protocol rules:
on clients request of ID response of ID is promised
internal state machine transition rules:
- cannot send anything until client responds
- responds with error on unexpected request

# Transport layer abstraction:
- configurable STDOUT/STDIN or tcp://address or more.

# Communication shape:
- the new lines, the JSON, the ID?
