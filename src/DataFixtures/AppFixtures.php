<?php

namespace App\DataFixtures;

use App\Entity\Boxe;
use App\Entity\Boxeur;
use App\Entity\Club;
use App\Entity\Commande;
use App\Entity\Formedeboxe;
use App\Entity\Licence;
use App\Entity\Users;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $users1 = new Users();
        $users1->setnom('dupont')
        ->setprenom('marie')
        ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        ->setsexe('f')
        ->setemail('mdupont@gmail.com')
        ->setadresse('1 rue du chemin')
        ->setDatenaiss(new \DateTime('06/04/1967'))
        ->setcodepostal('80567')
        ->setville('capville')
        ->settelephone('0697986575')
        ->setphoto('1.jpg')
        ->setformedeboxe('boxe_educative')
        ->setRoles(['ROLE_ADMIN']);
        $manager->persist($users1);

        $users2 = new Users();
        $users2->setnom('konan')
        ->setprenom('jude')
        ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        ->setsexe('f')
        ->setemail('judek@gmail.com')
        ->setadresse('9 route de paris')
        ->setDatenaiss(new \DateTime('06/04/1987'))
        ->setcodepostal('80123')
        ->setville('cardonelle')
        ->settelephone('0203946576')
        ->setphoto('2.jpg')
        ->setRoles(['ROLE_USER'])
        ->setformedeboxe('boxe_amateur');
        $manager->persist($users2);


        $users3 = new Users();
        $users3->setnom('duche')
        ->setprenom('eric')
        ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        ->setsexe('h')
        ->setemail('edu@gmail.com')
        ->setadresse('1 avenue de grece ')
        ->setDatenaiss(new \DateTime('06/04/1992'))
        ->setcodepostal('80987')
        ->setville('villers')
        ->settelephone('0607059876')
        ->setphoto('3.pjg')
        ->setRoles(['ROLE_USER'])
        ->setformedeboxe('aeroboxe');
        $manager->persist($users3);

        // $users4 = new Users();
        // $users4->setnom('')
        // ->setprenom('')
        // ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        // ->setsexe('h')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('4.jpg')
        // ->setRoles(['ROLE_USER'])
        // ->setformedeboxe('');
        // $manager->persist($users4);


        // $users5 = new Users();
        // $users5->setnom('')
        // ->setprenom('')
        // ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        // ->setsexe('')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('')
        // ->setformedeboxe('');
        // $manager->persist($users5);


        // $users6 = new Users();
        // $users6->setnom('')
        // ->setprenom('')
        // ->setsexe('')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('')
        // ->setformedeboxe('');
        // $manager->persist($users6);


        // $users7 = new Users();
        // $users7->setnom('')
        // ->setprenom('')
        // ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        // ->setsexe('')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('')
        // ->setformedeboxe('');
        // $manager->persist($users7);


        // $users8 = new Users();
        // $users8->setnom('')
        // ->setprenom('')
        // ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        // ->setsexe('')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('')
        // ->setformedeboxe('');
        // $manager->persist($users8);


        // $users9 = new Users();
        // $users9->setnom('')
        // ->setprenom('')
        // ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        // ->setsexe('')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('')
        // ->setformedeboxe('');
        // $manager->persist($users9);


        // $users10 = new Users();
        // $users10->setnom('')
        // ->setprenom('')
        // ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        // ->setsexe('')
        // ->setemail('')
        // ->setadresse('')
        // ->setDatenaiss('')
        // ->setcodepostal('')
        // ->setville('')
        // ->settelephone('')
        // ->setphoto('')
        // ->setformedeboxe('');
        // $manager->persist($users10);


        $commande = new Commande(); 
        $commande ->setIsPaid('')
        ->setMethode('')
        ->setStripeSessionId('')
        // ->setComUsers()
        ->setComFactId(1)
        ->setCreatedAt(new \DateTimeImmutable())
        ->setReference('');
        $manager->persist($commande);


        $boxeur1 = new Boxeur();
        $boxeur1 ->setFormedeboxe('amateur')
        ->setPalmares('5C/4V/1D');
        $manager->persist($boxeur1);

        $licence1 = new Licence();
        $licence1->setNom('clery')
        ->setPrenom('enzo')
        ->setDatenaiss('08/06/2000')
        ->setTelephone('0771655440')
        ->setEmail('enzo.cmery1704@gmail.com')
        ->setPhoto('1.jpg')
        ->setSexe('h')
        ->setAdresse('46 bis rue principale ')
        ->setVille('bazancourt')
        ->setCodepostal('60380')
        ->setDatecreat('9/9/2023')
        ->setNomlicence('amatrur')
        ->setNumlicence($boxeur1);
        $manager->persist($licence1);
            
        $Formedeboxe1 = new Formedeboxe();
        $Formedeboxe1->setNom('boxe educative')
        ->setDescription('boxe avec coup  non porté')
        ->setPrix(150)
        ->setPhoto('logoa.png');
        $manager->persist($Formedeboxe1);

        $Formedeboxe2 = new Formedeboxe();
        $Formedeboxe2->setNom('boxe amateur')
        ->setDescription('boxe avec coup porté avec casque')
        ->setPrix(150)
        ->setPhoto('logob.png');
        $manager->persist($Formedeboxe2);

        $Formedeboxe3 = new Formedeboxe();
        $Formedeboxe3->setNom('boxe pro')
        ->setDescription('boxe sans casque bandage dur')
        ->setPrix(150)
        ->setPhoto('logodc.png');
        $manager->persist($Formedeboxe3);

        $Formedeboxe4 = new Formedeboxe();
        $Formedeboxe4->setNom('aeroboxe')
        ->setDescription('choregraphie avec la gestuelle boxe')
        ->setPrix(150)
        ->setPhoto('logod.png');
        $manager->persist($Formedeboxe4);

        $club1 = new Club();
        $club1->setNom('amiens bc')
        ->setAdresse('rue du moulin neuf ')
        ->setCodepostal('80000')
        ->setTelephone('0626259768')
        ->setEmail('jeromefouache@msn.com')
        ->setLogo('logoclub.jpg')
        ->setVille('Amiens');
        $manager->persist($club1);



        $manager->flush();
    }
}