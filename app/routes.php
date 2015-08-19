<?php
	
	$w_routes = array(
		['GET', '/admin/termes/', 'Term#showAll', 'show_all_terms'],
		['GET', '/admin/termes/suppression/[i:id]/', 'Term#delete', 'terms_delete'],
		['GET', '/admin/termes/modification/[i:id]/', 'Term#update', 'terms_update'],
	);