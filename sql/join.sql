
SELECT r.*,u.name,u.term_id FROM table_one AS r  
LEFT JOIN table_two AS u ON u.term_id = r.term_id ORDER BY parent

/*  r is the alias for table_one.
u is the alias for table_two 

term_id is the foreign key
ORDER BY is optional 
*/
