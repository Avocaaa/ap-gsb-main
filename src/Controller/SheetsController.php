<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\Exception\RecordNotFoundException;
use App\Model\Table\SheetsPackagesTable;

/**
 * Sheets Controller
 *
 * @property \App\Model\Table\SheetsTable $Sheets
 * @method \App\Model\Entity\Sheet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SheetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'States'],
        ];
        $sheets = $this->paginate($this->Sheets);

        $this->set(compact('sheets'));
    }

    /**
     * View method
     *
     * @param string|null $id Sheet id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sheet = $this->Sheets->get($id, [
            'contain' => ['Users', 'States', 'Outpackages', 'Packages'],
        ]);

        $this->set(compact('sheet'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $sheet = $this->Sheets->newEmptyEntity();

    if ($this->request->is('post')) {
        $sheet = $this->Sheets->patchEntity($sheet, $this->request->getData());

        if ($this->Sheets->save($sheet)) {
            // Récupérez l'id de la nouvelle feuille
            $sheetId = $sheet->id;

            // Créez une nouvelle entrée dans la table sheet_packages avec package_id = 1
            $this->createSheetPackage($sheetId, 1, 0);

            // Créez une autre entrée dans la table sheet_packages avec package_id = 2
            $this->createSheetPackage($sheetId, 2, 0);

            // Créez une autre entrée dans la table sheet_packages avec package_id = 3
            $this->createSheetPackage($sheetId, 4, 0);

            $this->Flash->success(__('The sheet has been saved.'));
            return $this->redirect(['action' => 'list']);
        } else {
            $this->Flash->error(__('The sheet could not be saved. Please, try again.'));
        }
    }

        $users = $this->Sheets->Users->find('list', ['limit' => 200])->all();
        $states = $this->Sheets->States->find('list', ['limit' => 200])->all();
        $outpackages = $this->Sheets->Outpackages->find('list', ['limit' => 200])->all();
        $packages = $this->Sheets->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('sheet', 'users', 'states', 'outpackages', 'packages'));
    }

    private function createSheetPackage($sheetId, $packageId, $quantity)
{
    $sheetPackagesTable = new SheetsPackagesTable();
    $sheetPackage = $sheetPackagesTable->newEmptyEntity();

    $data = [
        'sheet_id' => $sheetId,
        'package_id' => $packageId,
        'quantity' => $quantity,
    ];

    $sheetPackage = $sheetPackagesTable->patchEntity($sheetPackage, $data);

    if (!$sheetPackagesTable->save($sheetPackage)) {
        $this->Flash->error(__('Error creating sheet package.'));
    }
}

    /**
     * Edit method
     *
     * @param string|null $id Sheet id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sheet = $this->Sheets->get($id, [
            'contain' => ['Outpackages', 'Packages'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sheet = $this->Sheets->patchEntity($sheet, $this->request->getData());
            if ($this->Sheets->save($sheet)) {
                $this->Flash->success(__('The sheet has been saved.'));

                return $this->redirect(['action' => 'comptablelist']);
            }
            $this->Flash->error(__('The sheet could not be saved. Please, try again.'));
        }
        $users = $this->Sheets->Users->find('list', ['limit' => 200])->all();
        $states = $this->Sheets->States->find('list', ['limit' => 200])->all();
        $outpackages = $this->Sheets->Outpackages->find('list', ['limit' => 200])->all();
        $packages = $this->Sheets->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('sheet', 'users', 'states', 'outpackages', 'packages'));
    }
    public function editadmin($id = null)
    {
        $sheet = $this->Sheets->get($id, [
            'contain' => ['Outpackages', 'Packages'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sheet = $this->Sheets->patchEntity($sheet, $this->request->getData());
            if ($this->Sheets->save($sheet)) {
                $this->Flash->success(__('The sheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sheet could not be saved. Please, try again.'));
        }
        $users = $this->Sheets->Users->find('list', ['limit' => 200])->all();
        $states = $this->Sheets->States->find('list', ['limit' => 200])->all();
        $outpackages = $this->Sheets->Outpackages->find('list', ['limit' => 200])->all();
        $packages = $this->Sheets->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('sheet', 'users', 'states', 'outpackages', 'packages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sheet id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sheet = $this->Sheets->get($id);
        if ($this->Sheets->delete($sheet)) {
            $this->Flash->success(__('The sheet has been deleted.'));
        } else {
            $this->Flash->error(__('The sheet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }
    public function list()
    {
        $this->paginate = [
            'contain' => ['Users', 'States'],
        ];

        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];
        
        $sheets = $this->paginate($this->Sheets->find('all')->where(['user_id' => $iduser]));

        $this->set(compact('sheets'));
    }
    public function votreAction($packageId)
{
    if ($this->request->is('post') && $this->request->getData('save_quantity')) {
        $data = $this->request->getData();
        $quantity = $data["packages"][$packageId]["quantity"];
        
        // Update the quantity in the database using $packageId and $quantity
        // Add your logic here to update the database record
        
        // Redirect or set flash messages as needed
        $this->Flash->success(__('Quantity updated successfully.'));
        return $this->redirect(['action' => 'index']); // Redirect to the appropriate action
    }
}
public function clientview($id = null)
{
    
    $sheet = $this->Sheets->get($id, [
        'contain' => ['Users', 'States', 'Outpackages', 'Packages'],
    ]);

    if ($this->request->is('post')) {
        $postData = $this->request->getData();

        if (isset($postData['packages'])) {
            foreach ($postData['packages'] as $packageId => $packageData) {
                // Vérifie que la quantité est définie
                if (isset($packageData['quantity'])) {
                    $quantity = $packageData['quantity'];

                    // Met à jour la table d'association SheetsPackages
                    $this->Sheets->Packages->SheetsPackages->updateAll(
                        ['quantity' => $quantity],
                        ['sheet_id' => $id, 'package_id' => $packageId]
                    );
                    
                }
            }
            $this->Flash->success(__('La quantité a été mise à jour.'));
            return $this->redirect(['action' => 'clientview', $id]);
        }
    }

    $this->set(compact('sheet'));
}
public function comptableview($id = null)
{
    
    $sheet = $this->Sheets->get($id, [
        'contain' => ['Users', 'States', 'Outpackages', 'Packages'],
    ]);

    if ($this->request->is('post')) {
        $postData = $this->request->getData();

        if (isset($postData['packages'])) {
            foreach ($postData['packages'] as $packageId => $packageData) {
                // Vérifie que la quantité est définie
                if (isset($packageData['quantity'])) {
                    $quantity = $packageData['quantity'];

                    // Met à jour la table d'association SheetsPackages
                    $this->Sheets->Packages->SheetsPackages->updateAll(
                        ['quantity' => $quantity],
                        ['sheet_id' => $id, 'package_id' => $packageId]
                    );
                    
                }
            }
            $this->Flash->success(__('La quantité a été mise à jour.'));
            return $this->redirect(['action' => 'clientview', $id]);
        }
    }

    $this->set(compact('sheet'));
}



public function viewadmin($id = null)
{
    
    $sheet = $this->Sheets->get($id, [
        'contain' => ['Users', 'States', 'Outpackages', 'Packages'],
    ]);

    if ($this->request->is('post')) {
        $postData = $this->request->getData();

        if (isset($postData['packages'])) {
            foreach ($postData['packages'] as $packageId => $packageData) {
                // Vérifie que la quantité est définie
                if (isset($packageData['quantity'])) {
                    $quantity = $packageData['quantity'];

                    // Met à jour la table d'association SheetsPackages
                    $this->Sheets->Packages->SheetsPackages->updateAll(
                        ['quantity' => $quantity],
                        ['sheet_id' => $id, 'package_id' => $packageId]
                    );
                    
                }
            }
            $this->Flash->success(__('La quantité a été mise à jour.'));
            
        }
    }

    $this->set(compact('sheet'));
}
public function comptablelist()
    {
        
        $this->paginate = [
            'contain' => ['Users', 'States'],
        ];

        
        $sheets = $this->paginate($this->Sheets->find('all'));

        $this->set(compact('sheets'));
    }

public function updateOutpackages($sheetId)
{
    $this->request->allowMethod(['post']);

    // Récupérez les données du formulaire
    $postData = $this->request->getData('outpackages');

    foreach ($postData as $id => $data) {
        // Mettez à jour la base de données en utilisant l'id
        $outpackage = $this->Sheets->Outpackages->get($id);
        $this->Sheets->Outpackages->patchEntity($outpackage, $data);
        $this->Sheets->Outpackages->save($outpackage);
    }

    // Redirigez où vous le souhaitez après la mise à jour
    $this->Flash->success(__('Enregistrement réussi.'));
    return $this->redirect(['action' => 'clientview', $sheetId]);
}
 public function deleteoutpackages($id = null,$iduser = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $outpackage = $this->Outpackages->get($id);
        if ($this->Outpackages->delete($outpackage)) {
            $this->Flash->success(__('The outpackage has been deleted.'));
        } else {
            $this->Flash->error(__('The outpackage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'sheets','action' => 'clientview', $iduser]);
    }
public function addadmin()
{
    $sheet = $this->Sheets->newEmptyEntity();

    if ($this->request->is('post')) {
        $sheet = $this->Sheets->patchEntity($sheet, $this->request->getData());

        if ($this->Sheets->save($sheet)) {
            // R�cup�rez l'id de la nouvelle feuille
            $sheetId = $sheet->id;

            // Cr�ez une nouvelle entr�e dans la table sheet_packages avec package_id = 1
            $this->createSheetPackage($sheetId, 1, 0);

            // Cr�ez une autre entr�e dans la table sheet_packages avec package_id = 2
            $this->createSheetPackage($sheetId, 2, 0);

            // Cr�ez une autre entr�e dans la table sheet_packages avec package_id = 3
            $this->createSheetPackage($sheetId, 4, 0);

            $this->Flash->success(__('La feuille a �t� enregistr�e.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('La feuille n\'a pas pu �tre enregistr�e. Veuillez r�essayer.'));
        }
    }

    $users = $this->Sheets->Users->find('list', ['limit' => 200])->all();
    $states = $this->Sheets->States->find('list', ['limit' => 200])->all();
    $outpackages = $this->Sheets->Outpackages->find('list', ['limit' => 200])->all();
    $packages = $this->Sheets->Packages->find('list', ['limit' => 200])->all();
    $this->set(compact('sheet', 'users', 'states', 'outpackages', 'packages'));
}

    public function deletesheet($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sheet = $this->Sheets->get($id);
        if ($this->Sheets->delete($sheet)) {
            $this->Flash->success(__('La feuille a été supprimée.'));
        } else {
            $this->Flash->error(__("La feuille n'a pas pu être supprimée. Veuillez réessayer."));
        }

        return $this->redirect(['action' => 'index']);
    }
}





