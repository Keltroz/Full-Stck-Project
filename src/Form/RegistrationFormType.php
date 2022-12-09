<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, ["attr" => ["placeholder" => "First name", "class" => "form-control m-1"]])
            ->add('last_name', TextType::class, ["attr" => ["placeholder" => "Last name", "class" => "form-control m-1"]])
            ->add('email', TextType::class, ["attr" => ["placeholder" => "Email", "class" => "form-control m-1"]])
            ->add('address', TextType::class, ["attr" => ["placeholder" => "Address", "class" => "form-control m-1"]])
            ->add('phone', TextType::class, ["attr" => ["placeholder" => "Phone", "class" => "form-control m-1"]])
            ->add('agreeTerms', CheckboxType::class, [
                "attr" => ["class" => "form-check-input m-1", "type" => "checkbox", "value" => "", "id" => "flexCheckDefault"],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', "placeholder" => "Password", "class" => "form-control m-1"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
