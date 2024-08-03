Usage
=====

To gather the results of the checks, make a call to `/api/route`. The result is an array of all checks, with their name,
group, status and some description for non-successful checks. Checks can result in a success (which is fine), an info
(which might depend on your situation), a warning (which is likely problematic) or a fatal (which is almost always
unwanted).

You can configure the checks and some behaviour in the `config/audit.php` after publishing the config file. You should
most probably add a middleware to restrict the access to the route.

You can also use artisan. Note that this is only really useful for testing or if you have the same php configuration
for the CLI and the webserver which if you are not sure is probably not the case. It is advised to always check this
result against the result of `/api/route`. To execute the command, execute `php artisan audit`. You can pass group
names as arguments to only execute these groups. The exit code is `1` if and only if a non-successful check was
executed. You can also exclude check states, to list the available options execute the `--help` option.
