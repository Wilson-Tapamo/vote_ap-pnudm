import { Controller, Post, Body } from '@nestjs/common';
import { VotePresidentService } from './vote-president.service';

@Controller('vote-president')
export class VotePresidentController {
  constructor(private readonly votePresidentService: VotePresidentService) {}

  @Post('vote')
  async vote(@Body() body: { login_email: string; candidate: string }) {
    const { login_email, candidate } = body;
    return this.votePresidentService.updateVote(login_email, candidate);
  }
}
