<?php

namespace App\Controller\Admin;

use App\Entity\Movie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('originalName'),
            DateField::new('releaseDate'),
            AssociationField::new('actors'),
            AssociationField::new('genres'),
            ImageField::new('image')->setUploadDir("/public/assets/upload/images/movies")
            ->setBasePath("assets/upload/images/movies"),
            TextEditorField::new('synopsis'),
            AssociationField::new('studio'),
            BooleanField::new('seen'),
            BooleanField::new('watchList')
        ];
    }
    
}
