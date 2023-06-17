<?php

namespace App\Filament\Pages;

use App\Settings\WebsiteSettings as WebsiteSettingsClass;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class WebsiteSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = WebsiteSettingsClass::class;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('headerMessage')
                ->label('Message d\'en-tête'),
            MarkdownEditor::make('aboutText')
                ->label('Texte de présentation')
        ];
    }
}
