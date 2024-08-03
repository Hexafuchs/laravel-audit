Plugins
=======

If you want to create your own checks instead of working on the original repo, you can simple let your checks implement
the :php:interface:`\Hexafuchs\Audit\Checks\Checkable` interface or extend the abstract
:php:class:`\Hexafuchs\Audit\Checks\Check` class (which implements the
:php:interface:`\Hexafuchs\Audit\Checks\Checkable` interface, but might not be suitable for every use case), then merge
your checks into the audit.checks config array.

You can also not implement the interface if you want to have another return type, all checks in audit.checks that
contain an execute function will be executed with no arguments. Note that you will not be able to have colored output
in the artisan command for other status values.
