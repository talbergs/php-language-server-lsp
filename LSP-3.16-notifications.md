Server | Client | Method
-------+--------+--------
Server | Client | $/cancelRequest
Server |        | $/logTrace
Server | Client | $/progress
       | Client | $/setTrace
       | Client | exit
       | Client | initialized
Server |        | telemetry/event
       | Client | textDocument/didChange
       | Client | textDocument/didClose
       | Client | textDocument/didOpen
       | Client | textDocument/didSave
Server |        | textDocument/publishDiagnostics
       | Client | textDocument/willSave
Server |        | window/logMessage
Server |        | window/showMessage
       | Client | window/workDoneProgress/cancel
       | Client | workspace/didChangeConfiguration
       | Client | workspace/didChangeWatchedFiles
       | Client | workspace/didChangeWorkspaceFolders
       | Client | workspace/didCreateFiles
       | Client | workspace/didDeleteFiles
       | Client | workspace/didRenameFiles
