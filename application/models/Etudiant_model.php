<?

class Eudiant extends MY_Controller{

	public function createEtudiant($Data){

		$data = array(

			'nom' => $Data['nom'] ,
			'prenom' => $Data['prenom'] ,
			'filiere' => $Data['filiere'] ,
			'niveau' =>  $Data['niveau'] ,
			'cne' =>  $Data['cne'] ,
			'dateNaissance' => $Data['dateNaissance'] ,
			'createdAt' => $Data['createdAt'] ,
			'updatedAt' => $Data['updatedAt'] ,
		);

		$this->db->insert("Etudiant" , $data);




			)

	}
}