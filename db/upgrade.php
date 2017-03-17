<?php 
function xmldb_gephi_upgrade($oldversion) {    
	global $CFG;     
	$result = TRUE; 
	   /* if ($oldversion < XXXXXXXXXX) {

        // Define table gephi to be created.
        $table = new xmldb_table('gephi');

        // Adding fields to table gephi.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);

        // Adding keys to table gephi.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for gephi.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // gephi savepoint reached.
        upgrade_mod_savepoint(true, XXXXXXXXXX, 'gephi');
    }
	    if ($oldversion < XXXXXXXXXX) {

        // Define table gephi to be dropped.
        $table = new xmldb_table('gephi');

        // Conditionally launch drop table for gephi.
        if ($dbman->table_exists($table)) {
            $dbman->drop_table($table);
        }

        // gephi savepoint reached.
        upgrade_mod_savepoint(true, XXXXXXXXXX, 'gephi');
    }
	    if ($oldversion < XXXXXXXXXX) {

        // Define table gephi to be renamed to NEWNAMEGOESHERE.
        $table = new xmldb_table('gephi');

        // Launch rename table for gephi.
        $dbman->rename_table($table, 'NEWNAMEGOESHERE');

        // gephi savepoint reached.
        upgrade_mod_savepoint(true, XXXXXXXXXX, 'gephi');
    }
   */
	return $result;
}
