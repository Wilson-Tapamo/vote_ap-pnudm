import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { VotePresident } from '../vote-president/vote-president.entity';
import { AuthService } from './auth.service';
import { AuthController } from './auth.controller';

@Module({
  imports: [TypeOrmModule.forFeature([VotePresident])],
  providers: [AuthService],
  controllers: [AuthController],
})
export class AuthModule {}
