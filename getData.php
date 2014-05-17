<?php
require_once( "sparqllib.php" );
 
$db = sparql_connect( "http://dati.camera.it/sparql");
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
 
$sparql = "SELECT distinct * WHERE {
?atto a ocd:atto; 
dc:date ?data; 
dc:title ?denominazione; 
dc:description ?descrizione;
dc:relation ?pdf;
ocd:rif_leg <http://dati.camera.it/ocd/legislatura.rdf/repubblica_17>} 
ORDER BY DESC(?data)
";
$result = sparql_query( $sparql ); 
print json_encode($result);
