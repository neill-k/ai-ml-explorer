<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AiModelResource\Pages;
use App\Filament\Resources\AiModelResource\RelationManagers;
use App\Models\AiModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AiModelResource\RelationManagers\TasksRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\DataTypesRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\AlgorithmTypesRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\FrameworksRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\ImplementationGuidanceRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\ResearchPapersRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\RelatedModelsRelationManager;
use App\Filament\Resources\AiModelResource\RelationManagers\UseCasesRelationManager;

class AiModelResource extends Resource
{
    protected static ?string $model = AiModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Model Details')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('license')
                        ->maxLength(255),
                    TextInput::make('maintainers_authors')
                        ->maxLength(255),
                    DatePicker::make('date_added'),
                    DatePicker::make('date_updated'),
                    Select::make('implementation_guidance_id')
                        ->relationship('implementationGuidance', 'title')
                        ->preload(),
                    Toggle::make('is_gpu_accelerated')
                        ->label('GPU Accelerated'),
                    TextInput::make('interpretability_score')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(100),
                    TextInput::make('training_data_size_estimate')
                        ->maxLength(255),
                ]),

            Section::make('Descriptions')
                ->columns(1)
                ->schema([
                    MarkdownEditor::make('markdown_description')
                        ->label('Markdown Description'),
                    MarkdownEditor::make('limitations'),
                    MarkdownEditor::make('evaluation_metrics'),
                    MarkdownEditor::make('training_data_description')
                        ->label('Training Data Description'),
                    MarkdownEditor::make('interpretability_explanation'),
                    MarkdownEditor::make('algorithm_description')
                        ->label('Algorithm Description'),
                    MarkdownEditor::make('tasks_description')
                        ->label('Tasks Description'),
                    MarkdownEditor::make('related_models_description')
                        ->label('Related Models Description'),
                ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

public static function getRelations(): array
{
    return [
        TasksRelationManager::class,
        DataTypesRelationManager::class,
        AlgorithmTypesRelationManager::class,
        FrameworksRelationManager::class,
        // ImplementationGuidanceRelationManager::class,
        ResearchPapersRelationManager::class,
        RelatedModelsRelationManager::class,
        UseCasesRelationManager::class,
    ];
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAiModels::route('/'),
            'create' => Pages\CreateAiModel::route('/create'),
            'edit' => Pages\EditAiModel::route('/{record}/edit'),
        ];
    }
}
