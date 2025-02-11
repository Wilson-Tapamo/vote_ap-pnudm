import { VotePresidentService } from './vote-president.service';
export declare class VotePresidentController {
    private readonly votePresidentService;
    constructor(votePresidentService: VotePresidentService);
    vote(body: {
        login_email: string;
        candidate: string;
    }): Promise<any>;
}
