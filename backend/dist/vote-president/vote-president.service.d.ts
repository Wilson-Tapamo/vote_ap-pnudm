import { Repository } from 'typeorm';
import { VotePresident } from './vote-president.entity';
export declare class VotePresidentService {
    private votePresidentRepository;
    constructor(votePresidentRepository: Repository<VotePresident>);
    updateVote(login_email: string, candidate: string): Promise<any>;
}
