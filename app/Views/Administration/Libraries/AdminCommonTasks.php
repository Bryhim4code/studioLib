<?php

namespace Modules\Administration\Libraries;

use App\Libraries\FetchUtil;



class AdminCommonTasks
{


    public static function createUpdateProfile($profileData)
    {
        $post  = $profileData;
        $id = isset($post['id']) ? $post['id'] : null;
        if ($id != null && $id != '') { //update
            $w = isset($post['w']) ? $post['w'] . 'w' : '';
            $d = isset($post['d']) ? $post['d'] . 'd' : '';
            $h = isset($post['h']) ? $post['h'] . 'h' : '';
            $m = isset($post['m']) ? $post['m'] . 'm' : '';

            $payLoad = [
                'name' => $post['name'],
                'name-for-users' => $post['nameForUsers'],
                'override-shared-users' => $post['overrideSharedUsers'],
                'price' => $post['price'],
                'starts-when' => $post['startsWhen'],
                'validity' => $w . $d . $h . $m
            ];

            $result =  FetchUtil::patchRequest(MIKROTIK_CMD_PROFILE . '/*' . $id, json_encode($payLoad));
            return $result;
        } else { //create
            $w = isset($post['w']) ? $post['w'] . 'w' : '';
            $d = isset($post['d']) ? $post['d'] . 'd' : '';
            $h = isset($post['h']) ? $post['h'] . 'h' : '';
            $m = isset($post['m']) ? $post['m'] . 'm' : '';

            $payLoad = [
                'name' => $post['name'],
                'name-for-users' => $post['nameForUsers'],
                'override-shared-users' => $post['overrideSharedUsers'],
                'price' => $post['price'],
                'starts-when' => $post['startsWhen'],
                'validity' => $w . $d . $h . $m
            ];

            $result =  FetchUtil::putRequest(MIKROTIK_CMD_PROFILE, json_encode($payLoad));
            return $result;
        }
    }

    public static function createUpdateLimitation($limitationData)
    {

        $post = $limitationData;
        $limitationPayload = [
            'download-limit' => $post['download-limit'],
            'name' => $post['name'],
            'rate-limit-burst-rx' => $post['rate-limit-burst-rx'],
            'rate-limit-burst-threshold-rx' => $post['rate-limit-burst-threshold-rx'],
            'rate-limit-burst-threshold-tx' => $post['rate-limit-burst-threshold-tx'],
            'rate-limit-burst-time-rx' => $post['rate-limit-burst-time-rx'],
            'rate-limit-burst-time-tx' => $post['rate-limit-burst-time-tx'],
            'rate-limit-burst-tx' => $post['rate-limit-burst-tx'],
            'rate-limit-min-rx' => $post['rate-limit-min-rx'],
            'rate-limit-min-tx' => $post['rate-limit-min-tx'],
            'rate-limit-priority' => $post['rate-limit-priority'],
            'rate-limit-rx' => $post['rate-limit-rx'],
            'rate-limit-tx' => $post['rate-limit-tx'],
            'reset-counters-interval' => $post['reset-counters-interval'],
            'reset-counters-start-time' => $post['reset-counters-start-time'],
            'transfer-limit' => $post['transfer-limit'],
            'upload-limit' => $post['upload-limit'],
            'uptime-limit' => $post['uptime-limit']
        ];
        $result = null;
        if (empty($post['id']) || $post['id'] == '') {
            $result = FetchUtil::putRequest(MIKROTIK_CMD_LIMITATION, json_encode($limitationPayload));
        } else {
            $result = FetchUtil::patchRequest(MIKROTIK_CMD_LIMITATION . '/*' . $post['id'], json_encode($limitationPayload));
        }

        return $result;
    }



    public static function createProfileLimitation($profileLimitationData)
    {
        $post = $profileLimitationData;
        $weekdays = '';
        $weekdays .= (isset($post['sunday']) ? $post['sunday'] . ',' : '');
        $weekdays .= (isset($post['monday']) ? $post['monday'] . ',' : '');
        $weekdays .= (isset($post['tuesday']) ? $post['tuesday'] . ',' : '');
        $weekdays .= (isset($post['wednesday']) ? $post['wednesday'] . ',' : '');
        $weekdays .= (isset($post['thursday']) ? $post['thursday'] . ',' : '');
        $weekdays .= (isset($post['friday']) ? $post['friday'] . ',' : '');
        $weekdays .= (isset($post['saturday']) ? $post['saturday'] . '' : '');

        if (substr($weekdays, -1) == ',') {
            //remove any trailing comma
            $weekdays = substr($weekdays, 0, -1);
        }

        $profileLimitationPayload = [
            'from-time' => $post['from-time'],
            'limitation' => $post['limitation'],
            'profile' => $post['profile'],
            'till-time' => $post['till-time'],
            'weekdays' => $weekdays,
        ];

        $result =  FetchUtil::putRequest(MIKROTIK_CMD_PROFILE_LIMITATION, json_encode($profileLimitationPayload));
        return $result;
    }

    public static function updateProfileLimitation($profileLimitationData)
    {
        $post = $profileLimitationData;
        $weekdays = '';
        $weekdays .= (isset($post['sunday']) ? $post['sunday'] . ',' : '');
        $weekdays .= (isset($post['monday']) ? $post['monday'] . ',' : '');
        $weekdays .= (isset($post['tuesday']) ? $post['tuesday'] . ',' : '');
        $weekdays .= (isset($post['wednesday']) ? $post['wednesday'] . ',' : '');
        $weekdays .= (isset($post['thursday']) ? $post['thursday'] . ',' : '');
        $weekdays .= (isset($post['friday']) ? $post['friday'] . ',' : '');
        $weekdays .= (isset($post['saturday']) ? $post['saturday'] . '' : '');

        if (substr($weekdays, -1) == ',') {
            //remove any trailing comma
            $weekdays = substr($weekdays, 0, -1);
        }

        $profileLimitationPayload = [
            'from-time' => $post['from-time'],
            'limitation' => $post['limitation'],
            'profile' => $post['profile'],
            'till-time' => $post['till-time'],
            'weekdays' => $weekdays,
        ];

        $id = $post['id'];
        unset($post['id']);

        $result =  FetchUtil::putRequest(MIKROTIK_CMD_PROFILE_LIMITATION . '/*' . $id, json_encode($profileLimitationPayload));

        return $result;
    }


    //profiles

    public static function getProfileByName($name)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_PROFILE . '?name=' . $name);
        return $result;
    }
    public static function getAllProfiles()
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_PROFILE);
        return $result;
    }

    public static function getAllLmitation()
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_LIMITATION);
        return $result;
    }

    public static function getLimitationByName($name)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_LIMITATION . '?name=' . $name);
        return $result;
    }
    public static function getLimitationById($id)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_LIMITATION . '/*' . $id);
        return $result;
    }



    //Profile Limitations

    public static function getAllProfileLimitations()
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_PROFILE_LIMITATION);
        return $result;
    }
    public static function getProfileLimitationByProfile($name)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_PROFILE_LIMITATION . '?profile=' . $name);
        return $result;
    }
    public static function getProfileLimitationById($id)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_PROFILE_LIMITATION . '/*' . $id);
        return $result;
    }


    //Groups
    public static function getGroupByName($name)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_GROUP . '?name=' . $name);
        return $result;
    }

    public static function getUserProfileByProfile($name)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_USER_PROFILE . '?profile=' . $name);
        return $result;
    }

    public static function getUserProfileByUser($user)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_USER_PROFILE . '?user=' . $user);
        return $result;
    }
    /**
     * @running-active
     * @waiting
     * @used
     */
    public static function getUserProfileByState($state)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_USER_PROFILE . '?state=' . $state);
        return $result;
    }

    /**
     * @running-active
     * @waiting
     * @used
     * ?user=nlsph003a&state=running-active
     */
    public static function getUserProfileByParameter($param)
    {
        $result = FetchUtil::getRquest(MIKROTIK_CMD_USER_PROFILE . $param);
        return $result;
    }


    public static function deleteMikrotikComponent($id, $endpoint)
    {
        $result =  FetchUtil::deleteRequest($endpoint . '/*' . $id);
        if ($result != null || isset($result->error)) {
            return $result;
        } else {
            return 'SUCCESS';
        }
    }
}
