<?php
	class Pdf extends Controller{
		public function __construct(){
			$this->recipesModel = $this->model('RecipesModel');
		}

		/**
		 * Loads data from model and renders view with model's data as input
		 */
		public function index(){
            redirect('recipes');
        }
        
        /**
		 * 
		 */
		public function download($recipeID = null) {
            // Redirect to recipe search page (default) if no recipe id is provided
			if($recipeID == null) {
				redirect('pdf');
			}

			// Get recipe data
			$recipe = $this->recipesModel->getRecipeData($recipeID);

			// If recipe does not exist redirect to search page
			if($recipe == null) {
				redirect('pdf');
            }
            

			include_once APPROOT.'/helpers/TCPDF/tcpdf.php';
			
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetAuthor('TheRecipesProject');
            $pdf->SetTitle($recipe->title);
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            $pdf->AddPage();
            $html = '<h1 style="text-align:center">'.$recipe->title.'</h1>
            <p style="text-align:center">Author: '.$recipe->ownerid.'</p>
            <img src="'.URLROOT.$recipe->imagePath.'" style="text-align:center;object-fit:cover;height: 200px; max-width: 90%;" alt="Recipe Preview Image Here">
            <h4>Description: </h4><p>'.$recipe->description.'</p>
            <h4>Preparation Time: </h4><p>'.$recipe->prepTime.'</p>
            <h4>Serving Size: </h4><p>'.$recipe->servingSize.'</p>
            <h4>Ingredients: </h4><ul>';
            foreach($recipe->ingredients as $item) {
                $html = $html . '<li><p>' . $item['value'] . '</p></li>';
            }
            $html = $html.'</ul><h4>Directions: </h4><ol>';
            foreach($recipe->directions as $item) {
                $html = $html . '<li><p>' . $item['description'] . '</p></li>';
            }
            $html = $html.'</ol>';


			// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
            $pdf->writeHTML($html, true, false, true, false);

			// Output to screen for view/download
			ob_end_clean();
			$pdf->Output('hello_world.pdf'); 
		}
    }