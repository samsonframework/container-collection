<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 11:11
 */
namespace samsonframework\containercollection\tests\classes;

class Car
{
    /** @var Wheel */
    protected $frontLeftWheel;
    /** @var Wheel */
    protected $frontRightWheel;
    /** @var Wheel */
    protected $backLeftWheel;
    /** @var Wheel */
    protected $backRightWheel;

    /** @var DriverInterface */
    protected $driver;
    /**
     * @var DriverService
     */
    private $driverService;

    /**
     * Car constructor.
     *
     * @param DriverInterface $driver
     *
     * @param DriverService   $driverService
     * @InjectArgument(driver="SlowDriver")
     */
    public function __construct(DriverInterface $driver, DriverService $driverService)
    {

        $this->driver = $driver;
        $this->driverService = $driverService;
    }
}
