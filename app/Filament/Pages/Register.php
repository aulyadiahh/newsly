<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use App\Models\User;
use App\Models\Author;

class Register extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')     
                    ->required(),
                TextInput::make('username')
                    ->label('Username')     
                    ->required()
                    ->maxLength(255)
                    ->unique(Author::class),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(User::class),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->same('passwordConfirmation'),
                TextInput::make('passwordConfirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->dehydrated(false),
                FileUpload::make('avatar')
                    ->label('Avatar')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('avatars'),
                Textarea::make('bio')
                    ->label('Bio')
                    ->required()
                    ->maxLength(1000)
                    ->rows(3),
            ])->statePath('data');
    }

    public function register(): ?RegistrationResponse
    {
        
        try{
            $this->rateLimit(5);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            Notification::make()
                ->title('Terlalu banyak percobaan pendaftaran. Silakan coba lagi nanti.')
                ->body('Anda telah mencapai batas percobaan pendaftaran. Silakan tunggu beberapa saat sebelum mencoba lagi.')
                ->danger()
                ->send();
            return null;
        }
    

    $data = $this->form->getState();
    
        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'author',
        ]);

        // Create the author
        $author = Author::create([
            'user_id' => $user->id,
            'username' => $data['username'],
            'avatar' => $data['avatar'],
            'bio' => $data['bio'],
        ]);

        event(new Registered($user));

        $this->form->fill();
        
        Notification::make()
            ->title('Akun berhasil dibuat!')
            ->success()
            ->send();

            return app(RegistrationResponse::class);

    }


}