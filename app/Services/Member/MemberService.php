<?php

namespace App\Services\Member;

use App\Models\Member;
use function PHPUnit\Framework\throwException;

class MemberService
{
    public function getMemberByCardNumber($cardNo = '')
    {
        $member = Member::where('card_no', '=', $cardNo)->first();
        if (!blank($member)) {
            return $member;
        } else {
            return null;
        }
    }

    public function checkMemberStayOrNot($member)
    {
        if (!blank($member)) {
            if (!blank($member->stay)) {
                $payload['member_id'] = $member->Id;
                $payload['vehicle_id'] = $member->vehicle_id;
            } else {
                throw new \Exception('Error member stay from ');
            }
        } else {
            throw new \Exception('Error member not found');
        }
    }
}
