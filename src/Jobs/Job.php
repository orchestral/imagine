<?php namespace Orchestra\Imagine\Jobs;

use Illuminate\Bus\Queueable;
use Imagine\Image\ImageInterface;

abstract class Job
{
    /*
    |--------------------------------------------------------------------------
    | Queueable Jobs
    |--------------------------------------------------------------------------
    |
    | This job base class provides a central location to place any logic that
    | is shared across all of your jobs. The trait included with the class
    | provides access to the "onQueue" and "delay" queue helper methods.
    |
    */

    use Queueable;

    /**
     * The image manipulation implementation.
     *
     * @var \Imagine\Image\ImageInterface
     */
    protected $imagine;

    /**
     * Construct a new Job.
     *
     * @param \Imagine\Image\ImageInterface $imagine
     */
    public function __construct(ImageInterface $imagine)
    {
        $this->imagine = $imagine;
    }
}
