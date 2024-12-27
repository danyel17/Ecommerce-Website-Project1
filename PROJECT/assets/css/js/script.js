// Create a function to load scripts
function loadScripts() {
    // Load jQuery
    var jqueryScript = document.createElement('script');
    jqueryScript.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
    jqueryScript.onload = function() {
        // jQuery loaded, now load Bootstrap
        var bootstrapScript = document.createElement('script');
        bootstrapScript.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js';
        document.body.appendChild(bootstrapScript);
    };
    document.body.appendChild(jqueryScript);
}

// Call the function to load the scripts
loadScripts();