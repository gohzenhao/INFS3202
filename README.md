Entry to application is through index.php in /public folder
index will require the bootstrap.php located in /app folder and will then create a new
Core object which handles all the url rerouting
Ensure RewriteBase in .htaccess located in /public contains the correct name of your directory

URL rerouting
    - url will look similar to: "http://localhost/infs3202project" then any other sections appended form the url request separated by '/': /$1/$2/$3 where $1 = controller (located in /app/controllers)
                                $2 = method (function contained in controller object)
                                $3 onwards = parameters to method

bootstrap.php
    - will load /app/config/config.php which defines all global variables for db connection, and 
    root and url paths
    - Autoload classes instantiated (only classes from /app/libraries)

/controllers
    - Must extend Controllers class in /app/libraries
    - First entry point for loading a module, controller then loads view and model(if required)
    
/models
    - If model required database connection, create new Database() in constructor and save as property to obejct
    - for queries on db, create method in model, and within that call $this->db->query($sql) then bind any necessary values (sanitises query) then call resultSet() or single() both of which will execute then return the query. (default fetch mode is object)

/views
    - separated into sub folders based on name of controller (must be all lowercase for folder name), this allows for multiple views for a single controller (use different methods to load views)