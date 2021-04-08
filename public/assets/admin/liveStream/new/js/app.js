// replace these values with those generated in your TokBox Account
var apiKey = "47177364";
var sessionId = "2_MX40NzE3NzM2NH5-MTYxNzU4ODQ4NDg2Nn41bGtSazFkenlvaDJGNy9WNHo4K2phd09-fg";
var token="T1==cGFydG5lcl9pZD00NzE3NzM2NCZzaWc9MGNhMjYwZThiMzg5MWU3YmQxNGEyMDFkZGM4NjQyYjQ1Y2FmMzllMTpzZXNzaW9uX2lkPTJfTVg0ME56RTNOek0yTkg1LU1UWXhOelU0T0RRNE5EZzJObjQxYkd0U2F6Rmtlbmx2YURKR055OVdOSG80SzJwaGQwOS1mZyZjcmVhdGVfdGltZT0xNjE3NTg4NDk3Jm5vbmNlPTAuNjI5OTcyNzU5NjIzODE0MyZyb2xlPXB1Ymxpc2hlciZleHBpcmVfdGltZT0xNjE3NTkyMDk2JmluaXRpYWxfbGF5b3V0X2NsYXNzX2xpc3Q9";
// Handling all of our errors here by alerting them
function handleError(error) {
    if (error) {
        alert(error.message);
    }
}

// (optional) add server code here
initializeSession();

function initializeSession() {
    var session = OT.initSession(apiKey, sessionId);

    // Subscribe to a newly created stream
    session.on('streamCreated', function(event) {
        session.subscribe(event.stream, 'subscriber', {
            insertMode: 'append',
            width: '100%',
            height: '100%'
        }, handleError);
    });

    // Create a publisher
    var publisher = OT.initPublisher('publisher', {
        insertMode: 'append',
        width: '100%',
        height: '100%'
    }, handleError);

    // Connect to the session
    session.connect(token, function(error) {
        // If the connection is successful, initialize a publisher and publish to the session
        if (error) {
            handleError(error);
        } else {
            session.publish(publisher, handleError);
        }
    });
}
