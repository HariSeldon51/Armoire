function createModule(moduleType) {
    if((moduleType !== "login") || ($("#login-fragment").length === 0)) {
        var newModule = new IscaModule(moduleType);
        newModule = $("#wrapper").append(newModule); 
        return newModule;
    } else {
        return false;
    }
}

function createTable(searchType, tableData, tableColumns) {
    var dataType;
    var dataTableModule;
    var dataTableData = JSON.parse(tableData);
    
    switch(searchType) {
        case "accounts":
            dataType = "accountdatatable"; break;
        case "license":
            dataType = "licensedatatable"; break;
    }
    
    dataTableModule = createModule(dataType);
    accountTable = $(dataTableModule).find("#isca-table");
    console.log("Data table base created as an element.");
    accountTable.DataTable({
        data: dataTableData,
        "columns": tableColumns
    });
    $("#wrapper").append(accountTable);
}

function loginAuthorization() {
    //alert("Inside loginAuthorization");
    var loginUsername = document.getElementById('user-name').value;
    var loginHashHex = CryptoJS.SHA256("armoire" + document.getElementById('user-password').value);
    var loginPassword = loginHashHex.toString(CryptoJS.enc.Base64);
    var queryString = "../php/accountAuthenticate.php?username=" + loginUsername + "&password=" + loginPassword;
        
    //alert("Sending request to server...");
    serverRequest(queryString, function(responseMessage) {
        switch (responseMessage) {
            case "successful":
                $("#login-fragment").replaceWith('<h3>You have successfully logged into Armoire!</h3><ul><li>You may safely close this module and remain logged-in.</li><li>Select User -> Log Out from the menu bar or close the browser window to securely end this session.</li></ul>');
                $("#login-button").replaceWith('<span onclick="logout()" id="logout-button">Log Out</span>');
                break;
            case "invalid":
                $("#login-fragment").replaceWith(new LoginFragment(responseMessage)); break;
            case "unsuccessful":
                $("#login-fragment").replaceWith(new LoginFragment(responseMessage)); break;
            case "disconnected":
                $("#login-fragment").replaceWith(new LoginFragment(responseMessage)); break;
            case "redundant":
                $("#login-fragment").replaceWith('<span class="warning">You are already logged in!</span><ul><li>You may safely close this module and remain logged-in.</li><li>Select User -> Log Out from the menu bar or close the browser window to securely end this session.</li></ul>');
                $("#login-button").replaceWith('<span onclick="logout()" id="logout-button">Log Out</span>');
                break;
            //default:
                //alert(responseMessage);
        }
    });
}

function logout() {
    var queryString = "../php/accountLogout.php";
    
    serverRequest(queryString, function(responseMessage) {
        //alert("In logout() callback. Response message: " + responseMessage);
        switch (responseMessage) {
            case "successful":
                createModule("logout");
                $("#logout-button").replaceWith('<span onclick="createModule('+"'login'"+')" id="login-button">Log In</span>');
                break;
        }
    });
}

function searchAccounts(searchObject) {    
    
    //alert("Made it into searchAccounts()");
    var searchType = searchObject.searchType;
    console.log(searchType);
    var searchScope = searchObject.searchScope;
    console.log(searchScope);
    var searchFilter = searchObject.searchFilter;
    console.log(searchFilter);
    var searchQuery = searchObject.searchQuery;
    var searchColumns = searchObject.searchColumns;
    console.log(searchColumns);
    //alert("Loaded all search values.");
    
    var queryString = "../php/recordSearch.php?searchQuery="+searchQuery+"&searchType="+searchType+"&searchScope="+searchScope+"&searchFilter="+searchFilter;
    //alert("Created query.");
    console.log("Query string generated: " + queryString);
    
    //Send request to server. Anonymous function will be called once the server completes the query and provides a response.
    serverRequest(queryString, function(messageResponse) {    
        switch(messageResponse) {
            case "disconnected":
                //$(searchModule).find("#searchHeader").replaceWith( = "Could not establish a connection with the database."; 
                break;
            case "invalid":
                createModule("login");
                $("#login-fragment").replaceWith(new LoginFragment(messageResponse)); break;
            case "none":
                //$(searchModule).find("#searchHeader").textContent = "Your query produced no results. Please modify your parameters."; 
                alert("No results. Try again."); break;
            default:
                alert(messageResponse);
                createTable(searchType, messageResponse, searchColumns);
        }
    });
    //alert("Request sent.");
}

function serverRequest(queryRequest, queryCallback) {
    var ajaxRequest;
            
    //attempts to create an AJAX connection object.
    try {
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        try {
        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("The browser could not load the XMLHTTPRequest object.");
                return false;
            }
        }
    }
            
    //Tells the AJAX connection object to perform the action provided as a paramter when the request returns from the server.
    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4) {
            queryCallback(ajaxRequest.response);
        }
    }
            
    ajaxRequest.open("GET", queryRequest, true);
    ajaxRequest.send(null);         
}



/* --------------------------------

Server connection javascript that needs to be updated to MVC

-------------------------------- */

function searchFunction(myModule) {

    var ajaxRequest;
    var searchType = myModule.getElementById('selectSearchField').value;
    
    try {
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("The browser could not load the XMLHTTPRequest object.");
                return false;
            }
        }
    }
    
    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4) {
            var myResultsModule = createResultsModule();
            myResultsModule.innerHTML = ajaxRequest.responseText;
        }
    }
    
    var searchTerm = myModule.getElementById('accountSearchField').value;
    var queryString = "?searchTerm=" + searchTerm + "&searchType=" + searchType;
    ajaxRequest.open("GET", "../php/accountSearch.php" + queryString, true);
    ajaxRequest.send(null);
}

function pullAccount() {
    
    var ajaxRequest;
    
    try {
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("The browser could not load the XMLHTTPRequest object.");
                return false;
            }
        }
    }
    
    ajaxRequest.onreadystatechange = function() {
        if(ajaxRequest.readyState == 4) {
            document.getElementById('account_panel').innerHTML = ajaxRequest.responseText;
        }
    }
    
    var searchTerm = document.getElementById('account-option-selector').value;
    var queryString = "?accountToPull=" + searchTerm;
    ajaxRequest.open("GET", "../php/accountPull.php" + queryString, true);
    ajaxRequest.send(null);
    
}
