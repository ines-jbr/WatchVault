<?php

namespace App\Form;

use App\Entity\Montre;
use App\Entity\Vitrine;
use App\Entity\WatchCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MontreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')

            // Nom du fichier image (lecture seule)
            ->add('imageName', TextType::class, [
                'disabled' => true,
                'required' => false,
                'label' => 'Nom de l’image',
            ])

            // Téléversement d'une image
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'label' => 'Photo de la montre',
                'allow_delete' => false,
                'download_uri' => false,
            ])

            ->add('watchCollection', EntityType::class, [
                'class' => WatchCollection::class,
                'choice_label' => 'id',
                'disabled' => true,
            ])

            ->add('vitrines', EntityType::class, [
                'class' => Vitrine::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Montre::class,
        ]);
    }
}