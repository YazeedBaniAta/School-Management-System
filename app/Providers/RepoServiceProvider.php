<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //this for Teacher
        $this->app->bind(
            'App\Repository\interfaces\TeacherRepositoryInterface',
            'App\Repository\TheClasses\TeacherRepository');

        //this for Students
        $this->app->bind(
            'App\Repository\interfaces\StudentRepositoryInterface',
            'App\Repository\TheClasses\StudentRepository');

        //this for promotionStudents
        $this->app->bind(
            'App\Repository\interfaces\StudentPromotionRepositoryInterface',
            'App\Repository\TheClasses\StudentPromotionRepository');

        //this for Graduated
        $this->app->bind(
            'App\Repository\interfaces\StudentGraduatedRepositoryInterface',
            'App\Repository\TheClasses\StudentGraduatedRepository');

        //this for Fees
        $this->app->bind(
            'App\Repository\interfaces\FeesRepositoryInterface',
            'App\Repository\TheClasses\FeesRepository');

        //this for Fees Invoices
        $this->app->bind(
            'App\Repository\interfaces\FeesInvoicesRepositoryInterface',
            'App\Repository\TheClasses\FeesInvoicesRepository');

        //this for Receipt Students
        $this->app->bind(
            'App\Repository\interfaces\ReceiptStudentsRepositoryInterface',
            'App\Repository\TheClasses\ReceiptStudentsRepository');

        //this for ProcessingFees Students
        $this->app->bind(
            'App\Repository\interfaces\ProcessingFeesRepositoryInterface',
            'App\Repository\TheClasses\ProcessingFeesRepository');

        //this for Payment Students
        $this->app->bind(
            'App\Repository\interfaces\PaymentRepositoryInterface',
            'App\Repository\TheClasses\PaymentRepository');

        //this for Attendance Students
        $this->app->bind(
            'App\Repository\interfaces\AttendanceRepositoryInterface',
            'App\Repository\TheClasses\AttendanceRepository');

        //this for Subject Students
        $this->app->bind(
            'App\Repository\interfaces\SubjectRepositoryInterface',
            'App\Repository\TheClasses\SubjectRepository');

        //this for Exam
        $this->app->bind(
            'App\Repository\interfaces\ExamRepositoryInterface',
            'App\Repository\TheClasses\ExamRepository');

        //this for Quiz
        $this->app->bind(
            'App\Repository\interfaces\QuizRepositoryInterface',
            'App\Repository\TheClasses\QuizRepository');

        //this for Question
        $this->app->bind(
            'App\Repository\interfaces\QuestionRepositoryInterface',
            'App\Repository\TheClasses\QuestionRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
