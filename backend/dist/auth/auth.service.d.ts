import { Repository } from 'typeorm';
import { VotePresident } from '../vote-president/vote-president.entity';
export declare class AuthService {
    private votePresidentRepository;
    constructor(votePresidentRepository: Repository<VotePresident>);
    validateUser(login_email: string, mot_passe: string): Promise<VotePresident | null>;
}
