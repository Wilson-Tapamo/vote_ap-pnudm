import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { VotePresident } from './vote-president.entity';
import { VotePresidentService } from './vote-president.service';
import { VotePresidentController } from './vote-president.controller';

@Module({
  imports: [TypeOrmModule.forFeature([VotePresident])],
  providers: [VotePresidentService],
  controllers: [VotePresidentController],
})
export class VotePresidentModule {}
