<?php 

class CustomersController
{
	public static function addClientPage()
	{
		echo "Je suis bien dans la page Ajout de client";

		if (!empty($_POST))
		{
			var_dump($_POST);
			//Customers::verifaction_formulaire($_POST);
			if (empty($_SESSION["message"]))
			{
				$Customers = new Customers([
					'nom'		=>		strtolower(htmlentities($_POST["nom"])),
					'prenom'		=>		strtolower(htmlentities($_POST["prenom"])),
					'adresse'	=>		strtolower(htmlentities($_POST["adresse"])),
					'email'		=>		strtolower(htmlentities($_POST["email"])),
					'mot_de_passe'		=>		strtolower(htmlentities($_POST["mot_de_passe"])),
				]);

				
				

				if (!empty($_POST["message"]))
				{
					header("location:" . BASE_PATH . "addCustomers");
					exit;
				}
			}
		}

		include VIEWS . "app/addCustomer.php";

	}
}