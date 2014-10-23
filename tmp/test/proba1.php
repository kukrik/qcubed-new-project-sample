<?php require_once('../../qcubed.inc.php'); ?>

<?php require('../../includes/configuration/header.inc.php'); ?>



<div id="instructions">

    <h1>ExpandAsArray: Multiple Related Tables in One Swift Query</h1>


</div>



<div id="demoZone">

    <h2>Projects and Addresses for each Person</h2>

<?php

    QApplication::$Database[1]->EnableProfiling();



    $people = Person::LoadAll(

        QQ::Clause(

            QQ::ExpandAsArray(QQN::Person()->Address),

            QQ::ExpandAsArray(QQN::Person()->ProjectAsManager),

            QQ::ExpandAsArray(QQN::Person()->ProjectAsManager->Milestone)

        )

    );

   
    

    foreach ($people as $person) {

        echo "<strong>" . $person->FirstName . " " . $person->LastName . "</strong><br />";

        echo "Addresses: ";

        if (sizeof($person->_AddressArray) == 0) {

            echo "none";

        } else {

            foreach ($person->_AddressArray as $address) {

                echo $address->Street . "; ";

            }

        }

        echo "<br />";



        echo "Projects where this person is a project manager: ";

        if (sizeof($person->_ProjectAsManagerArray) == 0) {

            echo "none<br />";

        } else {

            echo "<br />";

            foreach($person->_ProjectAsManagerArray as $project) {

                echo $project->Name . " (milestones: ";



                if (sizeof($project->_MilestoneArray) == 0) {

                    echo "none";

                } else {

                    foreach ($project->_MilestoneArray as $milestone) {

                        echo $milestone->Name . "; ";

                    }

                }

                echo ")<br />";

            }

        }

        echo "<br />";

    }



    QApplication::$Database[1]->OutputProfiling();

?>

</div>



<?php require('../../includes/configuration/footer.inc.php'); ?>

