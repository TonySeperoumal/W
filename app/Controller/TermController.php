<?php

namespace Controller;

use \W\Controller\Controller;

class TermController extends Controller
{

	/**
	 * Affiche tous les termes
	 */
	public function showAll()
	{
		$this->allowTo('admin');

		$termManager = new \Manager\TermManager();
		$terms = $termManager->findAll("modifiedDate", "DESC");

		
		$this->show('term/show_all_terms', ['terms' => $terms]);
	}

	public function delete($id)
	{
		$termManager = new \Manager\TermManager();
		$termManager-> delete($id);

		$this->redirectToRoute('show_all_terms');
	}

	public function edit($id)
	{
		$this->allowTo('admin');
		$user = $this->getUser();

		$termManager = new \Manager\TermManager();

		if (!empty($_POST))
		{

			$name = trim($_POST['name']);

			if (strlen($_POST['name']) > 1){      //valider... un minimum

				$data = [
					'name' => $name,
					'modifiedDate' => date("Y-m-d H:i:s"),
				];

				$termManager->update($data, $id);//sauvegarder les modifications avc la methode update() du TermManager

				$this->redirectToRoute('show_all_terms');
			}
		}
		$term = $termManager -> find($id);

		$this->show('term/edit_term', ['term' => $term]);
	}

	public function changeWotd($id)
	{
		$termManager = new \Manager\TermManager();
		$wotd = $termManager->getCurrentWordOfTheDay();		
		debug($wotd);

		$termManager->update(['is_wotd' => 0], $wotd['id']);
		$termManager->update(['is_wotd' => 1], $id);

		$this->redirectToRoute('show_all_terms');


	}

	
}